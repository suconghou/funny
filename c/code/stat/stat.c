#include <stdio.h>
#include <stdlib.h>		/* exit */
#include <unistd.h>		/* read, write, close */
#include <string.h>		/* memcpy, memset */
#include <sys/socket.h> /* socket, connect */
#include <netdb.h>		/* struct hostent, gethostbyname */

void error(const char *msg)
{
	perror(msg);
	exit(0);
}

const char *hostname()
{
	return "My String";
}

void sendhttp()
{
	char *host = "media.suconghou.cn";
	int portno = 80;

	char message[1024];

	/* fill in the parameters */
	char *message_fmt = "POST /apikey=%s&command=%s HTTP/1.1\r\n\r\n";

	sprintf(message, message_fmt, "key", "cmd");
	printf("Request:\n%s\n", message);

	int sockfd;
	/* create the socket */
	sockfd = socket(AF_INET, SOCK_STREAM, 0);
	if (sockfd < 0)
	{
		error("ERROR opening socket");
	}

	/* lookup the ip address */
	struct hostent *server;
	server = gethostbyname(host);
	if (server == NULL)
	{
		char *res;
		asprintf(&res, "%s %s ", "ERROR, no such host:", host);
		error(res);
	}

	/* fill in the structure */
	struct sockaddr_in serv_addr;

	memset(&serv_addr, 0, sizeof(serv_addr));
	serv_addr.sin_family = AF_INET;
	serv_addr.sin_port = htons(portno);
	memcpy(&serv_addr.sin_addr.s_addr, server->h_addr, server->h_length);

	/* connect the socket */
	if (connect(sockfd, (struct sockaddr *)&serv_addr, sizeof(serv_addr)) < 0)
	{
		error("ERROR connecting");
	}

	/* send the request */

	int bytes, sent, received, total;

	total = strlen(message);
	sent = 0;
	do
	{
		bytes = write(sockfd, message + sent, total - sent);
		if (bytes < 0)
			error("ERROR writing message to socket");
		if (bytes == 0)
			break;
		sent += bytes;
	} while (sent < total);
}

int main(int argc, char const *argv[])
{
	printf("%s\n", "hello");
	sendhttp();
	return 0;
}
