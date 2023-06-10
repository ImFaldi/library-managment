package routes

import (
	"github.com/gofiber/fiber/v2"
	"github.com/indrabpn12/FinalProjectGolang.git/controllers"
)

func RouteInit(app *fiber.App) {

	// Api for User
	app.Get("/api/user", controllers.GetAllUsers)
	app.Get("/api/user/:id", controllers.GetUser)
	app.Post("/api/user", controllers.NewUser)
	app.Put("/api/user/:id", controllers.UpdateUser)
	app.Delete("/api/user/:id", controllers.DeleteUser)

	// Api for Author
	app.Get("/api/author", controllers.GetAllAuthors)
	app.Get("/api/author/:id", controllers.GetAuthor)
	app.Post("/api/author", controllers.NewAuthor)
	app.Put("/api/author/:id", controllers.UpdateAuthor)
	app.Delete("/api/author/:id", controllers.DeleteAuthor)

	// Api for Category
	app.Get("/api/categorie", controllers.GetCategories)
	app.Get("/api/categorie/:id", controllers.GetCategory)
	app.Post("/api/categorie", controllers.NewCategory)
	app.Put("/api/categorie/:id", controllers.UpdateCategory)
	app.Delete("/api/categorie/:id", controllers.DeleteCategory)

	// Api for Book
	app.Get("/api/book", controllers.GetAllBooks)
	app.Get("/api/book/:id", controllers.GetBook)
	app.Post("/api/book", controllers.NewBook)
	app.Put("/api/book/:id", controllers.UpdateBook)
	app.Delete("/api/book/:id", controllers.DeleteBook)

	// Api for Borrow
	app.Get("/api/borrow", controllers.GetAllBorrows)
	app.Get("/api/borrow/:id", controllers.GetBorrow)
	app.Post("/api/borrow", controllers.NewBorrow)
	app.Put("/api/borrow/:id", controllers.UpdateBorrow)
	app.Delete("/api/borrow/:id", controllers.DeleteBorrow)

}
