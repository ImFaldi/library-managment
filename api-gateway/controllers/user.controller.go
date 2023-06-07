package controllers

import (
	"github.com/gofiber/fiber"
	"github.com/indrabpn12/FinalProjectGolang.git/database"
	"github.com/indrabpn12/FinalProjectGolang.git/models"
)

func GetAllUsers(c *fiber.Ctx) error {
	var users []models.User

	database.DB.Find(&users)

	return c.JSON(fiber.Map{
		"data": users,
	})
}

func GetUser(c *fiber.Ctx) error {
	var user models.User

	id := c.Params("id")

	database.DB.Find(&user, id)

	return c.JSON(fiber.Map{
		"data": user,
	})
}

func NewUser(c *fiber.Ctx) error {
	user := new(models.User)

	if err := c.BodyParser(user); err != nil {
		return c.Status(503).JSON(fiber.Map{
			"message": "Can't parse JSON",
			"error":   err,
		})
	}

	database.DB.Create(&user)

	return c.JSON(fiber.Map{
		"data": user,
		"msg":  "User created",
	})
}

func UpdateUser(c *fiber.Ctx) error {

	id := c.Params("id")

	user := new(models.User)

	if err := c.BodyParser(user); err != nil {
		return c.Status(503).JSON(fiber.Map{
			"message": "Can't parse JSON",
			"error":   err,
		})
	}

	database.DB.Find(&user, id)

	database.DB.Save(&user)

	return c.JSON(fiber.Map{
		"data": user,
		"msg":  "User updated",
	})
}

func DeleteUser(c *fiber.Ctx) error {

	id := c.Params("id")

	user := new(models.User)

	database.DB.Find(&user, id)

	database.DB.Delete(&user)

	return c.JSON(fiber.Map{
		"data": user,
		"msg":  "User deleted",
	})
}
