package borrowcontroller

import (
	"net/http"

	"github.com/gin-gonic/gin"
	"github.com/indrabpn12/FinalProjectGolang.git/models"
)

// Index is a function to get all borrows data
func Index(c *gin.Context) {
	var borrows []models.Borrow
	models.DB.Find(&borrows)

	c.JSON(http.StatusOK, gin.H{"data": borrows})
}

// Create is a function to create a new borrow data
func Create(c *gin.Context) {
	var input models.Borrow

	if err := c.ShouldBindJSON(&input); err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": err.Error()})
		return
	}
	borrow := models.Borrow{Book_id: input.Book_id, User_id: input.User_id, Borrow_date: input.Borrow_date, Return_date: input.Return_date, Status: input.Status, Penalty: input.Penalty}
	models.DB.Create(&borrow)

	c.JSON(http.StatusOK, gin.H{"data": borrow})
}

// Show is a function to get a borrow data by id

func Show(c *gin.Context) {
	var borrow models.Borrow

	if err := models.DB.Where("id = ?", c.Param("id")).First(&borrow).Error; err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": "Data not found!"})
		return
	}

	c.JSON(http.StatusOK, gin.H{"data": borrow})
}

// Update is a function to update a borrow data by id

func Update(c *gin.Context) {
	var borrow models.Borrow

	if err := models.DB.Where("id = ?", c.Param("id")).First(&borrow).Error; err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": "Data not found!"})
		return
	}

	var input models.Borrow

	if err := c.ShouldBindJSON(&input); err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": err.Error()})
		return
	}
	models.DB.Model(&borrow).Updates(input)

	c.JSON(http.StatusOK, gin.H{"data": borrow})
}

// Delete is a function to delete a borrow data by id

func Delete(c *gin.Context) {
	var borrow models.Borrow

	if err := models.DB.Where("id = ?", c.Param("id")).First(&borrow).Error; err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": "Data not found!"})
		return
	}

	models.DB.Delete(&borrow)

	c.JSON(http.StatusOK, gin.H{"data": true})
}
