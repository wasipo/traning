#include <stdio.h>
#include <stdlib.h>

int swap(int *x, int *y)
{
	  int work;

		work = *x;
		*x = *y;
		*y = work;
}

int main(void)
{

		int input;
		int i;
		int size,j,k;

		printf("数字を入力 >>");
		scanf("%d",&input);

		int ran[input];

		srand((unsigned) time(NULL));

		for(i=0; i<input; i++)
		{
			ran[i] = rand() % 1000;
			if(i == 0)
			{
				printf("============no sort============\n");
			}
			printf("%4d\n",ran[i]);
		}

		size = sizeof(ran)/sizeof(ran[0]);

		for(j=0; j<size; j++)
		{
			for(k = size - 1; k > j; k--)
			{
				if(ran[k]<ran[k-1])
				{
					swap(&ran[k],&ran[k-1]);
				}
			}
			if(j == 0)
			{
				printf("============sort============\n");
			}
			printf("%4d\n",ran[j]);
		}
}
