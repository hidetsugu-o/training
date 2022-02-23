package main

import "fmt"

func main() {
	var any interface{}

	any = []int{1, 2}

	switch v := any.(type) {
	case int:
		fmt.Println("this is int :", v)
	case string:
		fmt.Println("this is string :", v)
	default:
		fmt.Println("その他の型 :", v)
	}
}
