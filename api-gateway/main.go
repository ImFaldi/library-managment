package main

import (
	"github.com/gofiber/fiber"
	"github.com/indrabpn12/FinalProjectGolang.git/database"
	"github.com/indrabpn12/FinalProjectGolang.git/routes"
)

func main() {
	//connect to database
	database.DatabaseInit()

	app := fiber.New()

	app.Get("/", func(c *fiber.Ctx) {
		c.JSON(fiber.Map{
			"message": "Hello, World!",
		})
	})

	routes.RouteInit(app)

	app.Listen(":3000")
}
