package controllers

import (
	"github.com/gofiber/fiber"
	"github.com/indrabpn12/FinalProjectGolang.git/database"
	"github.com/indrabpn12/FinalProjectGolang.git/models"
)

func GetAllBorrows(c *fiber.Ctx) error {
	var borrows []models.Borrow

	database.DB.Preload("User").Preload("Book").Preload("Book.Category").Preload("Book.Author").Find(&borrows)

	return c.JSON(fiber.Map{
		"data": borrows,
	})
}

func GetBorrow(c *fiber.Ctx) error {
	var borrow models.Borrow

	id := c.Params("id")

	database.DB.Preload("User").Preload("Book").Preload("Book.Category").Preload("Book.Author").Find(&borrow, id)

	return c.JSON(fiber.Map{
		"data": borrow,
	})
}

func NewBorrow(c *fiber.Ctx) error {
	borrow := new(models.Borrow)

	if err := c.BodyParser(borrow); err != nil {
		return c.Status(503).JSON(fiber.Map{
			"message": "Can't parse JSON",
			"error":   err,
		})
	}

	database.DB.Preload("User").Preload("Book").Preload("Book.Category").Preload("Book.Author").Create(&borrow)

	return c.JSON(fiber.Map{
		"data": borrow,
		"msg":  "Borrow created",
	})
}

func UpdateBorrow(c *fiber.Ctx) error {

	id := c.Params("id")

	borrow := new(models.Borrow)

	if err := c.BodyParser(borrow); err != nil {
		return c.Status(503).JSON(fiber.Map{
			"message": "Can't parse JSON",
			"error":   err,
		})
	}

	database.DB.Model(&borrow).Where("id = ?", id).Updates(models.Borrow{
		User_id:     borrow.User_id,
		Book_id:     borrow.Book_id,
		Borrow_date: borrow.Borrow_date,
		Return_date: borrow.Return_date,
		Status:      borrow.Status,
		Penalty:     borrow.Penalty,
	})

	return c.JSON(fiber.Map{
		"data": borrow,
		"msg":  "Borrow updated",
	})
}

func DeleteBorrow(c *fiber.Ctx) error {
	id := c.Params("id")

	borrow := new(models.Borrow)

	database.DB.Find(&borrow, id)

	database.DB.Delete(&borrow)

	return c.JSON(fiber.Map{
		"message": "Borrow successfully deleted",
	})
}
