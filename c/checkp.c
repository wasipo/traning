#include <stdio.h>
#include <string.h>


int main()
{
	int i, n, ret;	
	char buf[256], str[256], *token1, *token2;
	scanf("%d", &n);
	for(i = 0; i < n; i++)
	{
			scanf("%s", buf);
			scanf("%s", str);
			token1 = strtok(buf, ",");
			token2 = strtok(str, ",");

			ret = strcmp(token1,token2);
			if(ret == 0)
			{
				printf("true");
			} else {
				printf("false");
			}
	}
	return 0;
}
