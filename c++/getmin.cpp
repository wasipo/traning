#include <iostream>
#include <cstdlib>

using namespace std;

int main()
{
	int array[10];
	int i,arraysize = sizeof(array) / sizeof(array[0]);
	int min;

	srand(time(NULL));

	for(i=0; i<arraysize; i++)
	{

		array[i] = rand() % 1000;
		if(min > array[i])
		{
			min = array[i];
		}

		if(i==0)
		{
			min = array[i];
			cout << "配列の中身\n"  << array[i] << endl;
		} else {
			cout << array[i] << endl;
		}

  }

	cout << "配列の最小値\n" << min << endl;
}
