package categorycontroller

import (
	"net/http"

	"github.com/gin-gonic/gin"
	"github.com/indrabpn12/FinalProjectGolang.git/models"
)

// Index is a function to get all categories data
func Index(c *gin.Context) {
	var categories []models.Category
	models.DB.Find(&categories)

	c.JSON(http.StatusOK, gin.H{"data": categories})
}

// Create is a function to create a new category data
func Create(c *gin.Context) {
	var input models.Category

	if err := c.ShouldBindJSON(&input); err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": err.Error()})
		return
	}
	category := models.Category{Title: input.Title}
	models.DB.Create(&category)

	c.JSON(http.StatusOK, gin.H{"data": category})
}

// Show is a function to get a category data by id
func Show(c *gin.Context) {
	var category models.Category

	if err := models.DB.Where("id = ?", c.Param("id")).First(&category).Error; err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": "Data not found!"})
		return
	}

	c.JSON(http.StatusOK, gin.H{"data": category})
}

// Update is a function to update a category data by id

func Update(c *gin.Context) {
	var category models.Category

	if err := models.DB.Where("id = ?", c.Param("id")).First(&category).Error; err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": "Data not found!"})
		return
	}

	var input models.Category

	if err := c.ShouldBindJSON(&input); err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": err.Error()})
		return
	}
	models.DB.Model(&category).Updates(input)

	c.JSON(http.StatusOK, gin.H{"data": category})
}

// Delete is a function to delete a category data by id
func Delete(c *gin.Context) {
	var category models.Category

	if err := models.DB.Where("id = ?", c.Param("id")).First(&category).Error; err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": "Data not found!"})
		return
	}

	models.DB.Delete(&category)

	c.JSON(http.StatusOK, gin.H{"data": true})
}
