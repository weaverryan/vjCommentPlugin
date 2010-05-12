<?php foreach($form->getErrorSchema()->getErrors() as $error):
        echo "validator: "; print_r( $error->getValidator()->getErrorCodes());
        echo " error: "; echo $error->__toString(); endforeach;
        foreach($form as $id => $f): echo $id; echo $f->renderError(); endforeach; ?>
