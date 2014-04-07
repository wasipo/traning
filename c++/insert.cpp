#include <iostream>
#include <stdio.h>
#include <time.h>
#include <stdlib.h>

int main()
{

	int array[10],size;
	int i,j;
	int tmp;

	size = sizeof(array) / sizeof(array[0]);

	srand(time(NULL));

	for(i=0; i<size; i++)
	{
		array[i] = rand() % 1000;
	}

	std::cout << "======未ソート========" << std::endl;

	for(i=0; i<size; i++)
	{
			std::cout << array[i] << std::endl;
	}


	for(i=1; i<size; i++)
	{
			tmp = array[i];
			if(array[i-1]<tmp)
			{
				j=i;
				do
				{
					array[j]=array[j-1];
					j--;
				}while(j>0&&array[j-1]<tmp);
				array[j] = tmp;
			}
	}

	std::cout << "======ソート========" << std::endl;

	for(i=0; i<size; i++)
	{
			std::cout << array[i] << std::endl;
	}


}
