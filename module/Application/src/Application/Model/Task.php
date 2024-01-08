namespace Application\Model;

class Task {
    public $id;
    public $description;

    public function exchangeArray(array $data) {
        $this->id          = !empty($data['id']) ? $data['id'] : null;
        $this->description = !empty($data['description']) ? $data['description'] : null;
    }
}
