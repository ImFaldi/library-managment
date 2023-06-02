package main

import (
	bookcontroller "github.com/indrabpn12/FinalProjectGolang.git/controllers/bookController"
	"github.com/indrabpn12/FinalProjectGolang.git/models"

	"github.com/gin-gonic/gin"
)

func main() {
	r := gin.Default()

	models.ConnectDatabase()

	r.GET("/books", bookcontroller.Index)

	r.Run()
}
