package main

import (
	"github.com/gin-gonic/gin"
	"github.com/indrabpn12/FinalProjectGolang.git/controllers/authorcontroller"
	"github.com/indrabpn12/FinalProjectGolang.git/controllers/bookcontroller"
	"github.com/indrabpn12/FinalProjectGolang.git/controllers/borrowcontroller"
	"github.com/indrabpn12/FinalProjectGolang.git/controllers/categorycontroller"
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

	r.GET("api/authors", authorcontroller.Index)
	r.POST("api/authors", authorcontroller.Create)
	r.GET("api/authors/:id", authorcontroller.Show)
	r.PUT("api/authors/:id", authorcontroller.Update)
	r.DELETE("api/authors/:id", authorcontroller.Delete)

	r.GET("api/categories", categorycontroller.Index)
	r.POST("api/categories", categorycontroller.Create)
	r.GET("api/categories/:id", categorycontroller.Show)
	r.PUT("api/categories/:id", categorycontroller.Update)
	r.DELETE("api/categories/:id", categorycontroller.Delete)

	r.GET("api/borrows", borrowcontroller.Index)
	r.POST("api/borrows", borrowcontroller.Create)
	r.GET("api/borrows/:id", borrowcontroller.Show)
	r.PUT("api/borrows/:id", borrowcontroller.Update)
	r.DELETE("api/borrows/:id", borrowcontroller.Delete)

	r.Run()
}
