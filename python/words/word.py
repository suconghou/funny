#coding=utf-8
import os,re
dir='.'
def readall(dir):
	alltext=""
	dirlist=os.listdir(dir)
	for x in dirlist:
		filepath=os.path.join(dir,x)
		if not os.path.isdir(filepath):
			if filepath[-3:] =="txt":
				fp=open(filepath)
				data=fp.read()
				alltext=alltext+data
	return alltext
def getWord(text):
	regex=r'\b[a-zA-Z]{2,20}\b'
	res=re.compile(regex)
	words=res.findall(text)
	words=list(set(words))
	words.sort()
	return words

def writeFile(words):
	save=dir+"/words.md"
	print "Total Find :"+str(len(words))+" Save As "+save
	data="\n".join(words)
	fp=open(save,'wb')
	fp.write(data)
	fp.close()

if __name__=="__main__":
	words=getWord(readall('.'))
	writeFile(words)