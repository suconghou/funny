# coding=utf-8
import urllib
import urllib2
import re
import os
import sys
import socket
import threading
from time import ctime,sleep
from StringIO import StringIO
import gzip

socket.setdefaulttimeout(5)
url="http://tietuku.com/cate20-"
imgdir='image'
def Schedule(a,b,c):
	per = 100.0 * a * b / c
	if per > 100 : per = 100
	sys.stdout.write(u"------进度:%.1f%%\r" % per)
	sys.stdout.flush()
	
def getHtml(url):
	req=urllib2.Request(url)
	res=urllib2.urlopen(req)
	html=res.read()
	return html
def findImg(html):
	reg=r'http://i\d\.tietuku\.com/\w{17}\.jpg'
	pattern=re.compile(reg)
	findList=re.findall(pattern,html)
	return list(set(findList))

def downLoad(findList):
	print "Total Find: %d"%(len(findList))
	headers = {
		'User-Agent':'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36',
		'Accept':'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8'
	}
	for url in findList:
		name=url[-21:]
		local=imgdir+'/'+name
		try:
			response = urllib2.urlopen(url)
			if response.info().get('Content-Encoding') == 'gzip':
				buf = StringIO( response.read())
				f = gzip.GzipFile(fileobj=buf)
				data = f.read()
			else:
				data=response.read()
				File=open(local,'wb')
				File.write(data)
				File.close()
			print u"---下载完成:[%s]\n" % name
		except:
			print u"------下载失败:[%s]\n" % name


		

def start(page):
	maxPage=page+20
	if not os.path.exists(imgdir):
		os.mkdir(imgdir)
	while page<maxPage:
		print "Searching Page "+str(page)+" \n"
		sleep(1)
		html=getHtml(url+str(page))
		imglist=findImg(html)
		downLoad(imglist)
		page=page+1

if __name__ == '__main__':
	threadNum=5
	threads = []
	for x in xrange(1,threadNum):
		t1 = threading.Thread(target=start,args=(100*(x-1),))
		threads.append(t1)

	for t in threads:
		t.setDaemon(True)
		t.start()
	t.join()
	print "all over %s" %ctime()

