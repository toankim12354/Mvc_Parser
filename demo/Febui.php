<?php

interface ProductFactoryInterface {
    public function createBook(): Book;
    public function createCD(): CD;
    public function createDVD(): DVD;
}

class Book {
    public function __construct(
        public string $title,
        public string $author,
        public int $numberOfPages,
        public string $publisher,
        public int $publisheYear
    )
        {
        }
}

class BookBuilder {
    private string $title = '';
    private string $author = '';
    private int $numberOfPages = 0;
    private string $publisher = '';
    private int $publisheYear = 0;
    public function setTitle(string $title): BookBuilder {
        $this->title = $title;
        return $this;
    }
}
public function setAuthor(string $author): BookBuilder {
    $this->author = $author;
    return $this;

}
public function setNumberOfPages(int $numberOfPages): BookBuilder {
    $this->numberOfPages = $numberOfPages;
    return $this;

}
 public function setPublisher(string $publisher): BookBuilder {
    $this->publisher = $publisher;
    return $this;
}
public function setPublisheYear(int $publisheYear): BookBuilder {
    $this->publisheYear = $publisheYear;
    return $this;
}
public function createBook(): Book {
    return new Book($this->title, $this->author, $this->numberOfPages, $this->publisher, $this->publisheYear);
}
class  CD {
    public function __construct(
        public string $title,
        public string $artist,
        public int $numberOfTracks,
        public string $splayingTime
    ){}
}
class CDBuilder {
    private string $title = '';
    private string $artist = '';
    private int $numberOfTracks = 0;
    private int $splayingTime = 0;
    public function setTitle(string $title): CDBuilder {
        $this->title = $title;
        return $this;
    }
    public function setArtist(string $artist): CDBuilder {
        $this->artist = $artist;
        return $this;
    }
    public function setNumberOfTracks(int $numberOfTracks): CDBuilder {
        $this->numberOfTracks = $numberOfTracks;
        return $this;
    }
    public function setSplayingTime(int $splayingTime): CDBuilder {
        $this->splayingTime = $splayingTime;
        return $this;
    }
    public function build(): CD{
        return new CD($this->title, $this->artist, $this->numberOfTracks);
    }

}