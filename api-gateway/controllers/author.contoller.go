package controllers

import (
	"github.com/gofiber/fiber"
	"github.com/indrabpn12/FinalProjectGolang.git/database"
	"github.com/indrabpn12/FinalProjectGolang.git/models"
)

func GetAllAuthors(c *fiber.Ctx) error {
	var authors []models.Author

	database.DB.Find(&authors)

	return c.JSON(fiber.Map{
		"data": authors,
	})
}

func GetAuthor(c *fiber.Ctx) error {
	var author models.Author

	id := c.Params("id")

	database.DB.Find(&author, id)

	return c.JSON(fiber.Map{
		"data": author,
	})
}

func NewAuthor(c *fiber.Ctx) error {
	author := new(models.Author)

	if err := c.BodyParser(author); err != nil {
		return c.Status(503).JSON(fiber.Map{
			"message": "Can't parse JSON",
			"error":   err,
		})
	}

	database.DB.Create(&author)

	return c.JSON(fiber.Map{
		"data": author,
	})
}

func UpdateAuthor(c *fiber.Ctx) error {

	id := c.Params("id")

	author := new(models.Author)

	if err := c.BodyParser(author); err != nil {
		return c.Status(503).JSON(fiber.Map{
			"message": "Can't parse JSON",
			"error":   err,
		})
	}

	database.DB.Model(&author).Where("id = ?", id).Updates(models.Author{
		Name: author.Name,
	})

	return c.JSON(fiber.Map{
		"data": author,
	})
}

func DeleteAuthor(c *fiber.Ctx) error {
	id := c.Params("id")

	database.DB.Delete(&models.Author{}, id)

	return c.JSON(fiber.Map{
		"message": "Author deleted successfully",
	})
}

func GetAuthorBooks(c *fiber.Ctx) error {
	var books []models.Book

	id := c.Params("id")

	database.DB.Model(&models.Book{}).Where("author_id = ?", id).Find(&books)

	return c.JSON(fiber.Map{
		"data": books,
	})
}
