package routes

import (
	"github.com/gofiber/fiber"
	"github.com/indrabpn12/FinalProjectGolang.git/controllers"
)

func RouteInit(app *fiber.App) {

	// Api for Borrow
	app.Get("/api/borrow", func(c *fiber.Ctx) {
		controllers.GetAllBorrows(c)
	})

	app.Get("/api/borrow/:id", func(c *fiber.Ctx) {
		controllers.GetBorrow(c)
	})

	app.Post("/api/borrow", func(c *fiber.Ctx) {
		controllers.NewBorrow(c)
	})

	app.Put("/api/borrow/:id", func(c *fiber.Ctx) {
		controllers.UpdateBorrow(c)
	})

	app.Delete("/api/borrow/:id", func(c *fiber.Ctx) {
		controllers.DeleteBorrow(c)
	})

	// Api for Book
	app.Get("/api/book", func(c *fiber.Ctx) {
		controllers.GetAllBooks(c)
	})

	app.Get("/api/book/:id", func(c *fiber.Ctx) {
		controllers.GetBook(c)
	})

	app.Post("/api/book", func(c *fiber.Ctx) {
		controllers.NewBook(c)
	})

	app.Put("/api/book/:id", func(c *fiber.Ctx) {
		controllers.UpdateBook(c)
	})

	app.Delete("/api/book/:id", func(c *fiber.Ctx) {
		controllers.DeleteBook(c)
	})

	// Api for Category
	app.Get("/api/category", func(c *fiber.Ctx) {
		controllers.GetCategories(c)
	})

	app.Get("/api/category/:id", func(c *fiber.Ctx) {
		controllers.GetCategory(c)
	})

	app.Post("/api/category", func(c *fiber.Ctx) {
		controllers.NewCategory(c)
	})

	app.Put("/api/category/:id", func(c *fiber.Ctx) {
		controllers.UpdateCategory(c)
	})

	app.Delete("/api/category/:id", func(c *fiber.Ctx) {
		controllers.DeleteCategory(c)
	})

	// Api for Author
	app.Get("/api/author", func(c *fiber.Ctx) {
		controllers.GetAllAuthors(c)
	})

	app.Get("/api/author/:id", func(c *fiber.Ctx) {
		controllers.GetAuthor(c)
	})

	app.Post("/api/author", func(c *fiber.Ctx) {
		controllers.NewAuthor(c)
	})

	app.Put("/api/author/:id", func(c *fiber.Ctx) {
		controllers.UpdateAuthor(c)
	})

	app.Delete("/api/author/:id", func(c *fiber.Ctx) {
		controllers.DeleteAuthor(c)
	})

	// Api for User
	app.Get("/api/user", func(c *fiber.Ctx) {
		controllers.GetAllUsers(c)
	})

	app.Get("/api/user/:id", func(c *fiber.Ctx) {
		controllers.GetUser(c)
	})

	app.Post("/api/user", func(c *fiber.Ctx) {
		controllers.NewUser(c)
	})

	app.Put("/api/user/:id", func(c *fiber.Ctx) {
		controllers.UpdateUser(c)
	})

	app.Delete("/api/user/:id", func(c *fiber.Ctx) {
		controllers.DeleteUser(c)
	})

}
