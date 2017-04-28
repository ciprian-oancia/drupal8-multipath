<?php
/**
 * Created by PhpStorm.
 * 
 */

namespace Drupal\domains_rewrites_dynamicaly\Form;


use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class RewritesDynamicalyForm extends ConfigFormBase
{

    /**
     * Gets the configuration names that will be editable.
     *
     * @return array
     *   An array of configuration object names that are editable if called in
     *   conjunction with the trait's config() method.
     */
    protected function getEditableConfigNames()
    {
        return ['domains_rewrites_dynamicaly.settings'];
    }

    /**
     * Returns a unique string identifying the form.
     *
     * @return string
     *   The unique string identifying the form.
     */
    public function getFormId()
    {
        return 'domains_rewrites_dynamicaly_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)

    {
        $config_factory = $this->configFactory()->getEditable('domains_rewrites_dynamicaly.settings');

        $form['rewrites_path_prefix'] = array(
        '#type' => 'textfield',
        '#title' => $this->t('page Prefix'),
        '#description' => $this->t('Please specify the prefix, example : uk/london'),
        '#default_value' => $config_factory->get('rewrites_path_prefix')!==NULL ? $config_factory->get('rewrites_path_prefix') : ''
    );


        $form['actions']['#type'] = 'actions';
        $form['actions']['submit'] = array(
            '#type' => 'submit',
            '#value' => $this->t('Save configuration'),
            '#button_type' => 'primary',
        );

        // By default, render the form using system-config-form.html.twig.
        $form['#theme'] = 'system_config_form';

        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $config_factory = $this->configFactory()->getEditable('domains_rewrites_dynamicaly.settings');
        $config_factory->set('rewrites_path_prefix',$form_state->getValue('rewrites_path_prefix'))->save(true);
        drupal_set_message($this->t('The configuration options have been saved.'));
    }

}
