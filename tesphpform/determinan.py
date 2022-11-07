import numpy as np

arr = np.array([
    [4,0,0,1],
    [3,5,2,1],
    [0,4,1,1],
    [2,2,5,1]
])

def determinan_3(arr):
    result = ((arr[0][0]*arr[1][1]*arr[2][2])+
             (arr[0][1]*arr[1][2]*arr[2][0])+
             (arr[0][2]*arr[1][0]*arr[2][1])-
             ((arr[0][2]*arr[1][1]*arr[2][0])+
             (arr[0][0]*arr[1][2]*arr[2][1])+
             (arr[0][1]*arr[1][0]*arr[2][2])))
    return result

def ekspansiBaris(ind_row, arr, ind_col = 0):
    if ind_col == 4:
        return 0
    else:
        ind_row -= 1
        row = -1
        val_ind = arr[ind_row][ind_col]
        print('row =', ind_row+1)
        print('col =', ind_col+1)

        arr_exp = np.array([[0,0,0],[0,0,0],[0,0,0]])
        for i in range(0, 4):
            col = 0
            row +=1
            for j in range(0,4):
                if ind_row == i:
                    row -=1
                    break
                elif ind_col == j:
                    continue
                else:
                    if i == 3:
                        arr_exp[i-1][col] = arr[i][j]
                    else:
                        arr_exp[row][col] = arr[i][j]
                    
                    col +=1
        
        ind_col += 1
        ind_row += 1
        result = ((-1)**(ind_row+ind_col))*val_ind*determinan_3(arr_exp)
        print(arr_exp)
        print('val index =', val_ind)
        print('determinan 3x3 =',determinan_3(arr_exp))
        print(result)
        print()

        return result+ekspansiBaris(ind_row,arr,ind_col)

print()
print(ekspansiBaris(3,arr))