package controllers

import (
	"time"

	"github.com/gofiber/fiber/v2"
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

	userInput := new(models.UserInput)

	if err := c.BodyParser(user); err != nil {
		return c.Status(503).JSON(fiber.Map{
			"message": "Can't parse JSON",
			"error":   err,
		})
	}

	user.CreatedAt = time.Now()
	user.UpdatedAt = time.Now()

	database.DB.Create(&user)

	userInput.Name = user.Name
	userInput.Email = user.Email
	userInput.Password = user.Password
	userInput.Role = user.Role

	return c.JSON(fiber.Map{
		"data": userInput,
		"msg":  "User created",
	})

}

func UpdateUser(c *fiber.Ctx) error {

	id := c.Params("id")

	user := new(models.User)

	userInput := new(models.UserInput)

	if err := c.BodyParser(userInput); err != nil {
		return c.Status(503).JSON(fiber.Map{
			"message": "Can't parse JSON",
			"error":   err,
		})
	}

	database.DB.Find(&user, id)

	user.UpdatedAt = time.Now()

	database.DB.Model(&user).Updates(userInput)

	return c.JSON(fiber.Map{
		"data": userInput,
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
