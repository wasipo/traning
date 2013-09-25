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

		int i,ran[10];
		int size,j,k;
		int tmp;


		srand((unsigned) time(NULL));

		for(i=0; i<=10; i++)
		{
			ran[i] = rand() / 10000000;
		}

		size = sizeof(ran)/sizeof(ran[0]);

		for(j=0; j<size; j++)
		{
			for(k = size - 1; k > j; k--)
			{
				if(ran[k]<ran[k-1])
				{
				//	tmp = ran[k];
					swap(&ran[k],&ran[k-1]);
				}
			}
			printf("%4d",ran[j]);
		}
}
