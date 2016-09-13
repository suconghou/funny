#include <stdio.h>
#include <string.h>
#include <stdlib.h>
char hello[]="hi";
#define world "o"



int main(int argc,char **argv)
{

    char * res;
    asprintf(&res, "%s %s", hello, world);
    int len=strlen(res);
    switch(res[argc])
    {
        case 'h':
            printf("h is hit");
            break;
        case 'l':
            printf("l is hit");
            break;
        default :
            abort();
            printf("not catch");
            break;
    }

}
