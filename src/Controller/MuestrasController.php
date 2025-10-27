<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Muestras Controller
 *
 * @property \App\Model\Table\MuestrasTable $Muestras
 */
class MuestrasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Muestras->find();
        $muestras = $this->paginate($query);

        $this->set(compact('muestras'));
    }

    /**
     * View method
     *
     * @param string|null $id Muestra id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $muestra = $this->Muestras->get($id, contain: []);
        $this->set(compact('muestra'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $muestra = $this->Muestras->newEmptyEntity();
        if ($this->request->is('post')) {
            $muestra = $this->Muestras->patchEntity($muestra, $this->request->getData());
            if ($this->Muestras->save($muestra)) {
                $this->Flash->success(__('La muestra fue guardada con éxito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La muestra no pudo ser guardada. Por favor, inténtelo nuevamente.'));
        }
        $this->set(compact('muestra'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Muestra id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $muestra = $this->Muestras->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $muestra = $this->Muestras->patchEntity($muestra, $this->request->getData());
            if ($this->Muestras->save($muestra)) {
                $this->Flash->success(__('La muestra fue modificada con éxito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La muestra no pudo ser modificada. Por favor, inténtelo nuevamente.'));
        }
        $this->set(compact('muestra'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Muestra id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $muestra = $this->Muestras->get($id);
        if ($this->Muestras->delete($muestra)) {
            $this->Flash->success(__('La muestra fue eliminada.'));
        } else {
            $this->Flash->error(__('La muestra no pudo ser eliminada. Por favor, inténtelo nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Metodo reporte
     * Genera un reporte con muestras y sus resultados asociados
     * ejecutando un Left Join entre Muestras y Resultados.
     * 
     * El Left Join asegura que todas las muestras se incluyan en el reporte,
     * incluso si no tienen resultados asociados.
     *
     */
    public function reporte()
    {
        $connection = \Cake\Datasource\ConnectionManager::get('default');
        $especieSeleccionada = $this->request->getQuery('especie');

        $sql = "
            SELECT 
                m.id,
                m.empresa,
                m.especie,
                COALESCE(r.poder_germinativo, 'N/A') AS poder_germinativo,
                COALESCE(r.pureza, 'N/A') AS pureza,
                COALESCE(r.materiales_inertes, 'N/A') AS materiales_inertes
            FROM muestras m
            LEFT JOIN resultados r
            ON m.id = r.muestra_id
        ";

        $params = [];

        if (!empty($especieSeleccionada)) {
            $sql .= " WHERE m.especie = :especie";
            $params['especie'] = $especieSeleccionada;
        }

        $muestras = $connection->execute($sql, $params)->fetchAll('assoc');

        $rows = $connection->execute("
            SELECT DISTINCT m.especie
            FROM muestras m
            WHERE m.especie IS NOT NULL
        ")->fetchAll('assoc');

        $especies = [];
        foreach ($rows as $row) {
            $especie = $row['especie'];
            $especies[$especie] = $especie;
        }

        $this->set(compact('muestras', 'especies', 'especieSeleccionada'));
    }
}
