package main

import "fmt"

func main() {
	var any interface{}

	any = "hogefuga"

	value, ok := any.(int)

	fmt.Println(value, ok)
}
