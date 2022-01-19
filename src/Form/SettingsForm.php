<?php

namespace Drupal\colab_markerio\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure Marker.io settings for this site.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'markerio_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['colab_markerio.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['destination'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Marker.io destination key'),
      '#default_value' => $this->config('colab_markerio.settings')->get('destination'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('colab_markerio.settings')
      ->set('destination', $form_state->getValue('destination'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
