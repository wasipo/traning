#include <stdio.h>

int main(void)
{
		char buf[256];

		printf("延々と入力");
		while(fgets(buf, sizeof(buf), stdin))
		{
				printf(buf);		
		}

}
