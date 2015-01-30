<?php
Form::macro( 'inputContact',
	/**
	 * Affiche un bloc de champs pour la page contact
	 *
	 * @param string $name
	 * @param string $label
	 * @param array  $options
	 * @param object $errors
	 * @param bool   $isObligatory
	 *
	 * @return string
	 */
	function ( $name, $label, $options = [ ], $errors, $isObligatory = false , $value = null) {
		$options[ 'id' ] = $name;
		$html            = '<div class="inline-block form__element" >';
		$html .= '<label for="' . $name . '" class="hightlight label__text">';
		$html .= $label;
		if ( $isObligatory ) {
			$html .= '<span class="span--spacing asterisque">*</span>';
		}
		$html .= '</label>';
		$html .= Form::text( $name, $value, $options );
		$html .= $errors->first( $name, '<span itemprop="error" class="error">:message</span>' );
		$html .= '</div>';

		return $html;
	} );

Form::macro( 'passwordContact',
	/**
	 * Affiche un bloc de champs de type password pour la page contact
	 *
	 * @param string $name
	 * @param string $label
	 * @param array  $options
	 * @param object $errors
	 * @param bool   $isObligatory
	 *
	 * @return string
	 */
	function ( $name, $label, $options = [ ], $errors, $isObligatory = false ) {
		$options[ 'id' ] = $name;
		$html            = '<div class="inline-block form__element" >';
		$html .= '<label for="' . $name . '" class="hightlight label__text">';
		$html .= $label;
		if ( $isObligatory ) {
			$html .= '<span class="span--spacing asterisque">*</span>';
		}
		$html .= '</label>';
		$html .= Form::password ($name, $options );
		$html .= $errors->first( $name, '<span itemprop="error" class="error">:message</span>' );
		$html .= '</div>';

		return $html;
	} );

Form::macro( 'textareaContact',
	/**
	 * Affiche un bloc de champs pour la page contact
	 *
	 * @param string $name
	 * @param string $label
	 * @param array  $options
	 * @param object $errors
	 * @param bool   $isObligatory
	 *
	 * @return string
	 */
	function ( $name, $label, $options = [ ], $errors, $isObligatory = false ) {
		$options[ 'id' ] = $name;
		$html            = '<div class="inline-block form__element--fullSize" >';
		$html .= '<label for="' . $name . '" class="hightlight label__text">';
		$html .= $label;
		if ( $isObligatory ) {
			$html .= '<span class="span--spacing asterisque">*</span>';
		}
		$html .= '</label>';
		$html .= Form::textarea( $name, null, $options );
		$html .= $errors->first( $name, '<span itemprop="error" class="error">:message</span>' );
		$html .= '</div>';

		return $html;
	} );

Form::macro( 'submitContact',
	/**
	 * Affiche un bouton submit pour la page contact
	 *
	 * @param string $value
	 *
	 * @return string
	 */
	function ( $value ) {
		$html = '<div class="inline-block form__element--fullSize" >';
		$html .= Form::submit( $value, [ 'class' => 'input__submit' ] );
		$html .= '<label class="hightlight " class="hightlight label__text">';
		$html .= 'Tous les champs munis d’un astérisque<span class="span--spacing asterisque">(*)</span>sont obligatoires';
		$html .= '</label>';
		$html .= '</div>';

		return $html;
	} );
