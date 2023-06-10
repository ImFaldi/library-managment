package main

import (
	"github.com/gofiber/fiber/v2"
	"github.com/indrabpn12/FinalProjectGolang.git/database"
	"github.com/indrabpn12/FinalProjectGolang.git/routes"
)

func main() {
	//connect to database
	database.DatabaseInit()

	app := fiber.New()

	routes.RouteInit(app)

	app.Listen(":3000")
}
