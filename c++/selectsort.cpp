#include <iostream>
#include <cstdlib>

int swap(int *x, int *y);

using namespace std;

int swap(int *x, int *y)
{
	  int work;

		work = *x;
		*x = *y;
		*y = work;

		return 0;
}



int main()
{
	int array[10];
	int i,j,arraysize = sizeof(array) / sizeof(array[0]);
	int min;

	srand(time(NULL));

	cout << "\nソート前" << endl;

	for(i=0; i<arraysize; i++)
	{
		array[i] = rand() % 1000;
		cout << array[i] << endl;
  }
	
	cout << "\nソート後" << endl;

	for(i=0; i<arraysize; i++)
	{
		min = i;
		for(j=i+1; j<arraysize; j++)
		{
			if(array[min] > array[j])
			{
				min = j;
			}
		}
		swap(&array[min],&array[i]);
		cout << array[i] << endl;
	}

}
