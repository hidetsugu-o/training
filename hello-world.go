package main

import "fmt"

func main() {
	var greeting string
	fmt.Print("挨拶を入力：")
	fmt.Scan(&greeting)

	fmt.Println("Hello-World!")
}
