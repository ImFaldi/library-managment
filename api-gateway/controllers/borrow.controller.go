package controllers

import (
	"github.com/gofiber/fiber/v2"
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

	//masukan data ke BorrowInput untuk di tampilkan

	borrowInput := new(models.BorrowInput)

	borrowInput.User_id = borrow.User_id
	borrowInput.Book_id = borrow.Book_id
	borrowInput.Borrow_date = borrow.Borrow_date
	borrowInput.Return_date = borrow.Return_date
	borrowInput.Status = borrow.Status
	borrowInput.Penalty = borrow.Penalty

	return c.JSON(fiber.Map{
		"data": borrowInput,
		"msg":  "Borrow created",
	})
}

func UpdateBorrow(c *fiber.Ctx) error {

	id := c.Params("id")

	borrow := new(models.Borrow)
	borrowInput := new(models.BorrowInput)

	if err := c.BodyParser(borrowInput); err != nil {
		return c.Status(503).JSON(fiber.Map{
			"message": "Can't parse JSON",
			"error":   err,
		})
	}

	database.DB.Where("id = ?", id).First(&borrow)

	database.DB.Model(&borrow).Updates(borrowInput)

	return c.JSON(fiber.Map{
		"data": borrowInput,
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
