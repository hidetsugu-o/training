package main

import (
	"fmt"
)

func fizzbuzz(n int, max int) {
	multiOf3 := (n%3 == 0)
	multiOf5 := (n%5 == 0)

	if multiOf3 && multiOf5 {
		fmt.Println("fizzbuzz")
	} else if multiOf3 {
		fmt.Println("fizz")
	} else if multiOf5 {
		fmt.Println("buzz")
	} else {
		fmt.Println(n)
	}

	if n < max {
		fizzbuzz(n+1, max)
	}
}

func main() {
	fizzbuzz(1, 100)
}
