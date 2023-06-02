package models

// Book is a model for book table
type Book struct {
	ID          uint   `json:"id"`
	Title       string `json:"title"`
	Category_id uint   `json:"category_id"`
	Author_id   uint   `json:"author_id"`
	Status      string `json:"status"`
	Year        string `json:"year"`
}
