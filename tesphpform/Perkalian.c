/* perkalian matriks

*/

#include <stdio.h>

int main()

{

    int matriks1 [5][3];

    int matriks2 [3][3];

    int matriks3 [5][3];

    int i;

    int j;

    int kali;

    for(i = 0;i<5;i++)

    {

        for(j=0;j<3;j++)

        {

            printf("masukan angka matriks1 \n");

            scanf("%d",&matriks1[i][j]);

        }

    }

    for(i = 0;i<3;i++)

    {

        for(j=0;j<3;j++)

        {

            printf("masukan angka matriks2 \n");

            scanf("%d",&matriks2[i][j]);

        }

    }

      for(i = 0;i<5;i++)

    {

        for(j=0;j<3;j++)

        {

            matriks3[i][j] = 0;

            for(kali = 0; kali<3;kali++)

            {

                matriks3[i][j] = matriks3[i][j] + matriks1[i][kali] * matriks2[kali][j];

            }

        }

    }

    for(i = 0;i<5;i++)

    {

        for(j=0;j<3;j++)

        {

            printf("%d ",matriks3[i][j]);

        }
 printf("\n");
    }

    return 0;

    

}

