package models

type Borrow struct {
	ID          uint   `json:"id" gorm:"primaryKey"`
	User_id     uint   `json:"user_id"`
	User        User   `json:"user"`
	Book_id     uint   `json:"book_id"`
	Book        Book   `json:"book"`
	Borrow_date string `json:"borrow_date"`
	Return_date string `json:"return_date"`
	Status      string `json:"status"`
	Penalty     uint   `json:"penalty"`
}
