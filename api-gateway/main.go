package main

import (
	"github.com/gin-gonic/gin"
	"github.com/indrabpn12/FinalProjectGolang.git/controllers/bookcontroller"
	"github.com/indrabpn12/FinalProjectGolang.git/models"
)

func main() {
	r := gin.Default()

	models.ConnectDatabase()

	r.GET("api/books", bookcontroller.Index)
	r.POST("api/books", bookcontroller.Create)
	r.GET("api/books/:id", bookcontroller.Show)
	r.PUT("api/books/:id", bookcontroller.Update)
	r.DELETE("api/books/:id", bookcontroller.Delete)

	r.Run()
}
