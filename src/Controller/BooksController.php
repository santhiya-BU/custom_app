<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\BooksTable;
use App\Controller\Component\MyCustomComponent;
use App\Model\Behavior\MyLoggerBehavior;
use App\View\Helper\MyHelper;

class BooksController extends AppController
{
  
    // Attributes
    public $customTitle = 'Book List';

    // Callback: beforeFilter
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->set('customTitle', $this->customTitle);
    }

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('MyCustom'); //  Custom Component
        $this->Books->addBehavior('MyLogger'); //  Custom Behavior
    }

    // Custom Method
    public function index()
    {
        $this->Books->logAction("Books viewed");
        $this->Books->logInfo('Viewed the books list');
        $books = $this->paginate($this->Books);
        $greeting = $this->greetUser("Admin"); // From AppController
        $this->set(compact('books', 'greeting'));
    }

    
    public function add()
    {
        $book = $this->Books->newEmptyEntity();
        if ($this->request->is('post')) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
            if ($this->Books->save($book)) {
                $this->Flash->success(__('The book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));
        }
        $this->set(compact('book'));
    }

  
    public function edit($id = null)
    {
        $book = $this->Books->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
            if ($this->Books->save($book)) {
                $this->Flash->success(__('The book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));
        }
        $this->set(compact('book'));
    }

  
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $book = $this->Books->get($id);
        if ($this->Books->delete($book)) {
            $this->Flash->success(__('The book has been deleted.'));
        } else {
            $this->Flash->error(__('The book could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
