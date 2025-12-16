character = input("masukan karakter: ")
n = int(input("masukan jumlah baris: "))
for i in range (1, n+1):
    print(((" "+character+" ") *i).center(50))