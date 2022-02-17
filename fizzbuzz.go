package main

import (
	"fmt"
)

func main() {
	for i := 1; i <= 100; i++ {

		multiOf3 := (i%3 == 0)
		multiOf5 := (i%5 == 0)

		if multiOf3 && multiOf5 {
			fmt.Println("fizzbuzz")
		} else if multiOf3 {
			fmt.Println("fizz")
		} else if multiOf5 {
			fmt.Println("buzz")
		} else {
			fmt.Println(i)
		}
	}
}
