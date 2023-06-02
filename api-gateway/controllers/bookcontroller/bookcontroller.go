package bookcontroller

import (
	"net/http"

	"github.com/gin-gonic/gin"
	"github.com/indrabpn12/FinalProjectGolang.git/models"
)

// Index is a function to get all books data
func Index(c *gin.Context) {
	var books []models.Book
	models.DB.Find(&books)

	c.JSON(http.StatusOK, gin.H{"data": books})
}

// Create is a function to create a new book data
func Create(c *gin.Context) {
	var input models.Book

	if err := c.ShouldBindJSON(&input); err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": err.Error()})
		return
	}
	book := models.Book{Title: input.Title, Author_id: input.Author_id, Category_id: input.Category_id, Status: input.Status, Year: input.Year}
	models.DB.Create(&book)

	c.JSON(http.StatusOK, gin.H{"data": book})
}

// Show is a function to get a book data by id
func Show(c *gin.Context) {
	var book models.Book

	if err := models.DB.Where("id = ?", c.Param("id")).First(&book).Error; err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": "Data not found!"})
		return
	}

	c.JSON(http.StatusOK, gin.H{"data": book})
}

// Update is a function to update a book data by id
func Update(c *gin.Context) {
	var book models.Book

	if err := models.DB.Where("id = ?", c.Param("id")).First(&book).Error; err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": "Data not found!"})
		return
	}

	var input models.Book

	if err := c.ShouldBindJSON(&input); err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": err.Error()})
		return
	}
	models.DB.Model(&book).Updates(input)

	c.JSON(http.StatusOK, gin.H{"data": book})
}

// Delete is a function to delete a book data by id
func Delete(c *gin.Context) {
	var book models.Book

	if err := models.DB.Where("id = ?", c.Param("id")).First(&book).Error; err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": "Data not found!"})
		return
	}
	models.DB.Delete(&book)

	c.JSON(http.StatusOK, gin.H{"data": true})
}
