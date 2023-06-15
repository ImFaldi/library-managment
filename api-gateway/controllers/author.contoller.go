package controllers

import (
	"time"

	"github.com/gofiber/fiber/v2"
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

	authorInput := new(models.AuthorInput)

	if err := c.BodyParser(author); err != nil {
		return c.Status(503).JSON(fiber.Map{
			"message": "Can't parse JSON",
			"error":   err,
		})
	}

	author.CreatedAt = time.Now()

	author.UpdatedAt = time.Now()

	database.DB.Create(&author)

	authorInput.Name = author.Name
	authorInput.Email = author.Email
	authorInput.Phone = author.Phone

	return c.JSON(fiber.Map{
		"data": authorInput,
		"msg":  "Author created",
	})

}

func UpdateAuthor(c *fiber.Ctx) error {

	id := c.Params("id")

	author := new(models.Author)

	authorInput := new(models.AuthorInput)

	if err := c.BodyParser(authorInput); err != nil {
		return c.Status(503).JSON(fiber.Map{
			"message": "Can't parse JSON",
			"error":   err,
		})
	}

	author.UpdatedAt = time.Now()

	database.DB.Model(&author).Where("id = ?", id).Updates(authorInput)

	authorInput.Name = author.Name
	authorInput.Email = author.Email
	authorInput.Phone = author.Phone

	return c.JSON(fiber.Map{
		"data": authorInput,
		"msg":  "Author updated",
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
