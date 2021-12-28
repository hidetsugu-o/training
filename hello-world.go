package main

import (
	"fmt"
	"math/rand"
)

func main() {
	var greeting string
	fmt.Print("挨拶を入力：")
	fmt.Scan(&greeting)

	reply()
}

func reply() {
	i := rand.Intn(3)
	if i == 0 {
		fmt.Println("ヤッホー")
	} else if i == 1 {
		fmt.Println("hello world")
	} else {
		fmt.Println("moi moi")
	}
}
