package authorcontroller

import (
	"net/http"

	"github.com/gin-gonic/gin"
	"github.com/indrabpn12/FinalProjectGolang.git/models"
)

// Index is a function to get all authors data
func Index(c *gin.Context) {
	var authors []models.Author
	models.DB.Find(&authors)

	c.JSON(http.StatusOK, gin.H{"data": authors})
}

// Create is a function to create a new author data
func Create(c *gin.Context) {
	var input models.Author

	if err := c.ShouldBindJSON(&input); err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": err.Error()})
		return
	}
	author := models.Author{Name: input.Name, Email: input.Email, Phone: input.Phone}
	models.DB.Create(&author)

	c.JSON(http.StatusOK, gin.H{"data": author})
}

// Show is a function to get a author data by id
func Show(c *gin.Context) {
	var author models.Author

	if err := models.DB.Where("id = ?", c.Param("id")).First(&author).Error; err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": "Data not found!"})
		return
	}

	c.JSON(http.StatusOK, gin.H{"data": author})
}

// Update is a function to update a author data by id
func Update(c *gin.Context) {
	var author models.Author

	if err := models.DB.Where("id = ?", c.Param("id")).First(&author).Error; err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": "Data not found!"})
		return
	}

	var input models.Author

	if err := c.ShouldBindJSON(&input); err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": err.Error()})
		return
	}
	models.DB.Model(&author).Updates(input)

	c.JSON(http.StatusOK, gin.H{"data": author})
}

// Delete is a function to delete a author data by id
func Delete(c *gin.Context) {
	var author models.Author

	if err := models.DB.Where("id = ?", c.Param("id")).First(&author).Error; err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": "Data not found!"})
		return
	}
	models.DB.Delete(&author)

	c.JSON(http.StatusOK, gin.H{"data": true})
}
