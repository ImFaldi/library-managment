package controllers

import (
	"github.com/gofiber/fiber"
	"github.com/indrabpn12/FinalProjectGolang.git/database"
	"github.com/indrabpn12/FinalProjectGolang.git/models"
)

func GetCategories(c *fiber.Ctx) error {
	var categories []models.Category

	database.DB.Find(&categories)

	return c.JSON(fiber.Map{
		"data": categories,
	})
}

func GetCategory(c *fiber.Ctx) error {
	var category models.Category

	id := c.Params("id")

	database.DB.Find(&category, id)

	return c.JSON(fiber.Map{
		"data": category,
	})
}

func NewCategory(c *fiber.Ctx) error {
	category := new(models.Category)

	if err := c.BodyParser(category); err != nil {
		return c.Status(503).JSON(fiber.Map{
			"message": "Can't parse JSON",
			"error":   err,
		})
	}

	database.DB.Create(&category)

	return c.JSON(fiber.Map{
		"data": category,
		"msg":  "Category created",
	})
}

func UpdateCategory(c *fiber.Ctx) error {

	id := c.Params("id")

	category := new(models.Category)

	if err := c.BodyParser(category); err != nil {
		return c.Status(503).JSON(fiber.Map{
			"message": "Can't parse JSON",
			"error":   err,
		})
	}

	database.DB.Find(&category, id)
	database.DB.Save(&category)

	return c.JSON(fiber.Map{
		"data": category,
		"msg":  "Category updated",
	})
}

func DeleteCategory(c *fiber.Ctx) error {
	id := c.Params("id")

	category := new(models.Category)

	database.DB.First(&category, id)
	database.DB.Delete(&category)

	return c.JSON(fiber.Map{
		"data": true,
		"msg":  "Category deleted",
	})
}

func GetCategoryBooks(c *fiber.Ctx) error {
	var books []models.Book

	id := c.Params("id")

	database.DB.Where("category_id = ?", id).Find(&books)

	return c.JSON(fiber.Map{
		"data": books,
		"msg":  "Books by category",
	})
}
