package main

import (
	"github.com/gin-gonic/gin"
	"github.com/indrabpn12/FinalProjectGolang.git/controllers/bookcontroller"
)

func main() {
	r := gin.Default()

	r.GET("/books", bookcontroller.Index)
	r.POST("/books", bookcontroller.Store)
	r.GET("/books/:id", bookcontroller.Show)
	r.PUT("/books/:id", bookcontroller.Edit)
	r.DELETE("/books/:id", bookcontroller.Destroy)

	r.Run()
}
