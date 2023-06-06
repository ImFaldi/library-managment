package models

// Book is a model for book table
type Book struct {
	ID          uint   `json:"id"`
	Title       string `json:"title"`
	Category_id int    `json:"category_id"`
	Author_id   int    `json:"author_id"`
	Stock       int    `json:"stock"`
	Year        string `json:"year"`
}
