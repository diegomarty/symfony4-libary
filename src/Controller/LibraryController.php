<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LibraryController extends AbstractController
{

    private $logger;

    public function __construct()
    {
    }

    /**
     * @Route ("/books", name="books_get")
     *
     * @return void
     */
    public function list(Request $request, BookRepository $bookRepository)
    {
        $bookId = $request->get('id', 0);
        $bookName = $request->get('name', null);

        $books = $bookRepository->findAll();

        $booksAsJson = [];
        foreach ($books as $book) {
            $booksAsJson[] = [
                'id' => $book->getId(),
                'title' => $book->getTitle(),
                'image' => $book->getImage(),
            ];
        }


        $response = new JsonResponse();
        $response->setData([
            'success' => true,
            'data' => [
                [
                    'id' => 1,
                    'name' => 'Library 1',
                ],
                [
                    'id' => 2,
                    'name' => 'Library 2',
                ],
                [
                    'id' => $bookId,
                    'name' => $bookName,
                ]
            ]
        ]);

        return $response;
    }

    /**
     * @Route ("/book/create", name="create_book")
     *
     * @return void
     */
    public function createBook(Request $request, EntityManagerInterface $em)
    {
        $book = new Book();
        $response = new JsonResponse();

        $title = $request->get("title");

        if (empty($title)) {
            $response->setData([
                'success' => false,
                'message' => 'Title is required',
                'data' => null
            ]);
            return $response;
        }

        $book->setTitle($title);

        $em->persist($book);
        $em->flush();

        $response->setData([
            'success' => true,
            'data' => [
                [
                    'id' => $book->getId(),
                    'name' => $book->getTitle(),
                ]
            ]
        ]);

        return $response;
    }
}
