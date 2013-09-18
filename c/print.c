#include <stdio.h>


void main()
{
	int a,i;
	char buf[256];

	printf("数字>>");
	fgets(buf, sizeof(buf), stdin);
	sscanf(buf, "%d", &a);

	for(i = 0; i < a; i++)
	{
		printf("%d",i);
	}


	return 0;

}
