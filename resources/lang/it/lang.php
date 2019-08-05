<?php

return [

    'dashboard' => 'Pannello',
    '404'       => 'Pagina non trovata.',
    'auth'      => [
        'title'          => 'Autorizzazione',
        'username'       => 'Accesso',
        'password'       => 'Password',
        'login'          => 'Accedi',
        'logout'         => 'Uscita',
        'wrong-username' => 'Accesso non valido',
        'wrong-password' => 'o password',
        'since'          => 'Congiunto :date',
    ],
    'model'     => [
        'create' => 'Creare un documento nella sezione :title',
        'edit'   => 'Modifica di una voce nella sezione:title',
    ],
    'links'     => [
        'index_page' => 'Al sito',
    ],
    'ckeditor'  => [
        'upload'        => [
            'success' => 'Il file è stato caricato correttamente: \\n- Dimensione: :size kB \\n- larghezza/altezza: :width x :height',
            'error'   => [
                'common'              => 'Si è verificato un errore durante il caricamento del file.',
                'wrong_extension'     => 'File ":file" ha un tipo errato.',
                'filesize_limit'      => 'Massima dimensione del file :size кб.',
                'imagesize_max_limit' => 'Larghezza x Altezza = :width x :height \\n La dimensione massima dell\'immagine deve essere: :maxwidth x :maxheight',
                'imagesize_min_limit' => 'Larghezza x Altezza = :width x :height \\n La dimensione minima dell\'immagine deve essere: :minwidth x :minheight',
            ],
        ],
        'image_browser' => [
            'title'    => 'Inserimento di un\'immagine dal server',
            'subtitle' => 'Selezionare un\'immagine da inserire',
        ],
    ],
    'table'     => [
        'no-action'       => 'Non esiste alcuna azione',
        'make-action'     => 'Inviare',
        'new-entry'       => 'Nuovo record',
        'edit'            => 'Modifica',
        'restore'         => 'Ristabilire',
        'delete'          => 'Cancellare',
        'delete-confirm'  => 'Sei sicuro di voler eliminare questa voce?',
        'action-confirm'  => 'Sei sicuro di voler eseguire questa azione?',
        'delete-error'    => 'Impossibile eliminare questa voce. Devi prima cancellare tutte le voci correlate.',
        'destroy'         => 'Cancellare',
        'destroy-confirm' => 'Sei sicuro di voler eliminare questa voce?',
        'destroy-error'   => 'Impossibile eliminare questa voce. Devi prima cancellare tutte le voci correlate.',
        'moveUp'          => 'Vai in alto',
        'moveDown'        => 'Andate verso il basso',
        'error'           => 'Si è verificato un errore durante l\'elaborazione della richiesta',
        'filter'          => 'Mostra articoli simili',
        'filter-goto'     => 'Vai a',
        'save'            => 'Conservare',
        'save_and_close'  => 'Salva e chiudi',
        'save_and_create' => 'Salva e crea',
        'cancel'          => 'Annullare',
        'download'        => 'Scaricare',
        'all'             => 'Tutto',
        'processing'      => '<i class="fas fa-spinner fa-5x fa-spin"></i>',
        'loadingRecords'  => 'Aspettare...',
        'lengthMenu'      => 'Display _MENU_ record',
        'zeroRecords'     => 'Nessun dato corrispondente trovato.',
        'info'            => 'Registrazione con il _START_ sulla _END_ dalla _TOTAL_',
        'infoEmpty'       => 'Registrazione con il 0 sulla 0 dalla 0',
        'infoFiltered'    => '(filtrato dalla _MAX_ record)',
        'infoThousands'   => '',
        'infoPostFix'     => '',
        'search'          => 'Ricerca: ',
        'emptyTable'      => 'Non ci sono messaggi',
        'paginate'        => [
            'first'    => 'Il primo',
            'previous' => '&larr;',
            'next'     => '&rarr;',
            'last'     => 'L\'ultimo',
        ],
        'filters'         => [
            'control' => 'Filtro',
        ],
    ],
    'tree'      => [
        'expand'   => 'Espandi tutto',
        'collapse' => 'Riduci tutto',
    ],
    'editable'  => [
        'checkbox' => [
            'checked'   => 'Sì',
            'unchecked' => 'No',
        ],
    ],
    'select'    => [
        'nothing'     => 'Nulla selezionato',
        'selected'    => 'è selezionato',
        'placeholder' => 'Seleziona dall\'elenco',
        'no_items'    => 'Nessun elemento',
        'init'        => 'Stampa Enter per selezionare',
        'limit'       => 'e altro ancora ${count}',
        'deselect'    => 'Stampa Enter per ripristinare',
    ],
    'image'     => [
        'browse'         => 'Selezionare un\'immagine',
        'browseMultiple' => 'Selezione delle immagini',
        'remove'         => 'Cancellare',
        'removeMultiple' => 'Cancellare',
    ],
    'file'      => [
        'browse' => 'Seleziona un file',
        'remove' => 'Cancellare',
    ],
    'button'    => [
        'yes' => 'Sì',
        'no'  => 'No',
        'cancel' => 'Cancellazione',
    ],
    'message'   => [
        'created'              => '<i class="fas fa-check fa-lg"></i> La registrazione è stata creata correttamente',
        'updated'              => '<i class="fas fa-check fa-lg"></i> La registrazione aggiornato con successo',
        'deleted'              => '<i class="fas fa-check fa-lg"></i> La registrazione è stata eliminata correttamente',
        'restored'             => '<i class="fas fa-check fa-lg"></i> La registrazione è stata ripristinata correttamente',
        'something_went_wrong' => 'Qualcosa è andato storto!',
        'are_you_sure'         => 'Sei sicuro?',
        'access_denied'        => 'Accesso negato',
        'validation_error'     => 'Errore di convalida',
    ],
];
