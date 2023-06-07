package controllers

import (
	"github.com/gofiber/fiber"
	"github.com/indrabpn12/FinalProjectGolang.git/database"
	"github.com/indrabpn12/FinalProjectGolang.git/models"
)

func GetAllBooks(c *fiber.Ctx) error {
	var books []models.Book

	database.DB.Preload("Category").Preload("Author").Find(&books)

	return c.JSON(fiber.Map{
		"data": books,
	})
}

func GetBook(c *fiber.Ctx) error {
	var book models.Book

	id := c.Params("id")

	database.DB.Preload("Category").Preload("Author").Find(&book, id)

	return c.JSON(fiber.Map{
		"data": book,
	})
}

func NewBook(c *fiber.Ctx) error {
	book := new(models.Book)

	if err := c.BodyParser(book); err != nil {
		return c.Status(503).JSON(fiber.Map{
			"message": "Can't parse JSON",
			"error":   err,
		})
	}

	database.DB.Preload("Category").Preload("Author").Create(&book)

	return c.JSON(fiber.Map{
		"data": book,
		"msg":  "Book created",
	})
}

func UpdateBook(c *fiber.Ctx) error {

	id := c.Params("id")

	book := new(models.Book)

	if err := c.BodyParser(book); err != nil {
		return c.Status(503).JSON(fiber.Map{
			"message": "Can't parse JSON",
			"error":   err,
		})
	}

	database.DB.Find(&book, id)

	database.DB.Model(&book).Updates(book)

	return c.JSON(fiber.Map{
		"data": book,
		"msg":  "Book updated",
	})
}

func DeleteBook(c *fiber.Ctx) error {
	id := c.Params("id")

	book := new(models.Book)

	database.DB.Find(&book, id)

	database.DB.Delete(&book)

	return c.JSON(fiber.Map{
		"message": "Book successfully deleted",
	})
}

func GetBookByCategory(c *fiber.Ctx) error {
	var books []models.Book

	id := c.Params("id")

	database.DB.Preload("Category").Preload("Author").Where("category_id = ?", id).Find(&books)

	return c.JSON(fiber.Map{
		"data": books,
	})
}

func GetBookByAuthor(c *fiber.Ctx) error {
	var books []models.Book

	id := c.Params("id")

	database.DB.Preload("Category").Preload("Author").Where("author_id = ?", id).Find(&books)

	return c.JSON(fiber.Map{
		"data": books,
	})
}

func GetBookByUser(c *fiber.Ctx) error {
	var borrows []models.Borrow
	var books []models.Book

	id := c.Params("id")

	database.DB.Preload("User").Preload("Book").Preload("Book.Category").Preload("Book.Author").Where("user_id = ?", id).Find(&borrows)

	for _, borrow := range borrows {
		books = append(books, borrow.Book)
	}

	return c.JSON(fiber.Map{
		"data": books,
	})
}
